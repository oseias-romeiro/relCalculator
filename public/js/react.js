
const tansformer = (data, mode)=>{
    if (mode==='set') {
        return data.split(',');
    }else if (mode==='relation') {
        let relation = data.split(' ')
        let relation2 = []
        relation.forEach(element => relation2.push(element.split(',')));
        return relation2;
    }
}

const Matrix = ({ set, rel }) => {
    let mat = matrixGen(set, rel);
    return (
        <table className="table table-dark bg-dark text-center">
            {mat.map((line, rowIndex) => (
            <tr key={rowIndex}>
                {line.map((cell, cellIndex) => (
                    cellIndex == 0?  <td className="td_hd" key={cellIndex}>{cell}</td>
                    : <td key={cellIndex}>{cell}</td>
                ))}
            </tr>
            ))}
        </table>
    );
  };
  

const App = ()=>{
    const [hash, setHash] = React.useState(window.location.hash);
    const [set, setSet] = React.useState(['1','2','3']);
    const [rel, setRel] = React.useState([['1','1'], ['2','2'], ['3','3']]);
    const [setInput, setSetInput] = React.useState("1,2,3");
    const [relInput, setRelInput] = React.useState("");
    const [result, setResult] = React.useState(null);

    React.useEffect(() => {
        // valid hash
        if (hash === '' || hash === '#' || !hash.includes('set') || !hash.includes('rel')){
            const initHash = 'set=1,2,3&rel=1,1 2,2 3,3';
            setHash(initHash);
            window.location.hash = initHash;
            window.location.reload();
        }

        // get set and relation from hash
        let hashObj = hash.split('&');
        let set = hashObj[0].split('=')[1];
        let rel = hashObj[1].split('=')[1];
        rel = rel.replaceAll('%20', ' ')
        setSetInput(set);
        setRelInput(rel);

        // transform set and relation
        set = tansformer(set, 'set');
        rel = tansformer(rel, 'relation');
        setSet(set);
        setRel(rel);
        
        // get result
        let resultObj = new Relations(set, rel);
        setResult(resultObj);
    }, [hash]);

    const handlerSetInput = (e)=> setSetInput(e.target.value);
    const handlerRelInput = (e)=> setRelInput(e.target.value);

    const handleSubmit = (e)=>{
        e.preventDefault();
        window.location.hash = `set=${setInput}&rel=${relInput}`;
        setHash(window.location.hash);
    }

    const form = (
        <form>
            <label htmlFor="set">Set:</label>
            <input onChange={handlerSetInput} id="set" type="text" className="form-control" required value={setInput}/>
            <small>Use commas between items</small>
            <br/>
            <label htmlFor="relation">Relation:</label>
            <input onChange={handlerRelInput} id="relation" type="text" className="form-control" required value={relInput}/>
            <small>Use space between pairs and inside use commas</small>
            <br/>
            <button type="button" onClick={handleSubmit} className="btn btn-success">Go</button>
        </form>
      );
      

    return <div className="row">
        <div className="col-md-6">{form}</div>
        {result == null ? '' :
        <div className="col-md-3">
            <ul className="list-group">
                <li className="list-group-item">{result.isReflexive() ? 'is reflexive' : 'is not reflexive'}</li>
                <li className="list-group-item">{result.isSymmetric() ? 'is symmetric' : 'is not symmetric'}</li>
                <li className="list-group-item">{result.isAntisymmetric() ? 'is antisymmetric' : 'is not antisymmetric'}</li>
                <li className="list-group-item">{result.isTransitive() ? 'is transitive' : 'is not transitive'}</li>
            </ul>
        </div>}
        {result == null ? '' :
        <div className="col-md-3">
            <Matrix set={set} rel={rel}/>
        </div>}
    </div>
}

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(<App/>);
