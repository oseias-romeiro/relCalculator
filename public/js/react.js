
const transformer = (data, mode) => {
    if (mode === 'set') {
        return data
            .split(',')
            .filter(item => item.trim() !== "");
    } else if (mode === 'relation') {
        return data
            .split(' ')
            .filter(item => item.trim() !== "")
            .map(item => item.split(','));
    }
};

const App = () => {
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
        rel = rel.replaceAll('%20', ' ');
        set = set.replaceAll('%20', '');
        setSetInput(set);
        setRelInput(rel);

        // transform set and relation
        set = transformer(set, 'set');
        rel = transformer(rel, 'relation');
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
    const handleShare = (e) => {
        e.preventDefault();
        navigator.clipboard.writeText(
            window.location.href
        ).then(() => {
            alert('Link copied to clipboard!');
        });
    }

    const form = (
        <form>
            <label htmlFor="set">
                <b>Set:</b>
            </label>
            <input
                onChange={handlerSetInput}
                id="set"
                type="text"
                className="form-control"
                required
                value={setInput}
            />
            <small>Enter elements of the set. Use commas between items.</small>
            
            <br/><br/>
            
            <label htmlFor="relation">
                <b>Relation:</b>
            </label>
            <input
                onChange={handlerRelInput}
                id="relation"
                type="text"
                className="form-control"
                required
                value={relInput}
            />
            <small>Enter pairs using spaces.</small>
            
            <br/><br/>
            
            <div className="text-center">
                <button
                    type="button"
                    onClick={handleSubmit}
                    className="btn btn-success go_btn"
                >
                    <i className="bi bi-calculator mx-1"></i>
                    Calculate
                </button>
            </div>
        </form>
    );
    
    return <>
        <div className="row justify-content-center">
            <div className="col-md-6">
                {form}
            </div>
        </div>
        <hr/>
        {result == null ? '' :
        <>
            <div className="row justify-content-around align-items-center">
                <div className="col-md-4">
                    <ul className="list-group">
                        
                        <li className={
                            "list-group-item d-flex justify-content-between align-items-center" + (
                                result.isReflexive() ?
                                ' list-group-item-success' :
                                ' list-group-item-danger'
                            )
                        }>
                            Reflexive
                            <i className={
                                result.isReflexive() ?
                                'bi bi-check-circle-fill text-success pe-1' :
                                'bi bi-x-circle-fill text-danger pe-1'
                            }></i>
                        </li>

                        <li className={
                            "list-group-item d-flex justify-content-between align-items-center" + (
                                result.isSymmetric() ?
                                ' list-group-item-success' :
                                ' list-group-item-danger'
                            )
                        }>
                            Symmetric
                            <i className={
                                result.isSymmetric() ?
                                'bi bi-check-circle-fill text-success pe-1' :
                                'bi bi-x-circle-fill text-danger pe-1'
                            }></i>
                        </li>
                        <li className={
                            "list-group-item d-flex justify-content-between align-items-center" + (
                                result.isAntisymmetric() ?
                                ' list-group-item-success' :
                                ' list-group-item-danger'
                            )
                        }>
                            Antisymmetric
                            <i className={
                                result.isAntisymmetric() ?
                                'bi bi-check-circle-fill text-success pe-1' :
                                'bi bi-x-circle-fill text-danger pe-1'
                            }></i>
                        </li>
                        <li className={
                            "list-group-item d-flex justify-content-between align-items-center" + (
                                result.isTransitive() ?
                                ' list-group-item-success' :
                                ' list-group-item-danger'
                            )
                        }>
                            Transitive
                            <i className={
                                result.isTransitive() ?
                                'bi bi-check-circle-fill text-success pe-1' :
                                'bi bi-x-circle-fill text-danger pe-1'
                            }></i>
                        </li>
                    </ul>
                </div>
                <div className="col-md-4">
                    <div className="text-center mt-3">
                        <MatrixRender
                            set={set}
                            rel={rel}
                        />
                    </div>
                </div>
            </div>
            <div className="row justify-content-end">
                <div className="col-2">
                    <button
                        className="btn btn-success rounded-circle"
                        onClick={handleShare}
                    >
                        <i className="bi bi-share-fill"></i>
                    </button>
                </div>
            </div>
        </>
        }
    </>
}

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(<App/>);
