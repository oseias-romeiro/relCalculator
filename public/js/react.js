
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
    const [set, setSet] = React.useState(['1','2','3']);
    const [rel, setRel] = React.useState([['1','1'], ['2','2'], ['3','3']]);
    const [result, setResult] = React.useState(null);

    React.useEffect(() => {
        console.log("Set:", set);
        console.log("Rel:", rel);
        let resultObj = new Relations(set, rel);
        setResult(resultObj);
    }, [set, rel]);

    //let resultObj = new Relations(set, rel);
    //setResult(resultObj);

    const handlerSetInput = (e)=>{
        setSet(tansformer(e.target.value, 'set'));
    }
    const handlerRelInput = (e)=>{
        setRel(tansformer(e.target.value, 'relation'));
    }

    const form = (
        <form>
            <label htmlFor="set">Set:</label>
            <input onChange={handlerSetInput} id="set" type="text" className="form-control" placeholder="1,2,3" required />
            <br/>
            <label htmlFor="relation">Relation:</label>
            <input onChange={handlerRelInput} id="relation" type="text" className="form-control" placeholder="1,1 2,2 3,3" required />
        </form>
      );
      

    return <div className="row">
        <div className="col-md-6">{form}</div>
        {result == null ? '' :
        <div className="col-md-3">
            <p>{result.isReflexive() ? 'is reflexive' : 'is not reflexive'}</p>
            <p>{result.isSymmetric() ? 'is symmetric' : 'is not symmetric'}</p>
            <p>{result.isAntisymmetric() ? 'is antisymmetric' : 'is not antisymmetric'}</p>
            <p>{result.isTransitive() ? 'is transitive' : 'is not transitive'}</p>
        </div>}
        {result == null ? '' :
        <div className="col-md-3"><Matrix set={set} rel={rel}/></div>}
    </div>
}

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(<App/>);
