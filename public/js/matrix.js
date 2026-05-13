
const emptyMatrix = (set)=>{
    let matrix = [];
    set.forEach(e1 => {
        let line = [e1];
        set.forEach(e2 => {
            line.push(0);
        });
        matrix.push(line);
    });
    return matrix;
}

const fillMatrix = (set, rel, matrix)=>{
    rel.forEach(e => {
        matrix.forEach(line => {
            if(line[0] === e[0]){
                let y = set.indexOf(e[1]);
                if (y != -1) line[y+1] = 1;
            }
        });
    });
    return matrix;
}

const getMatrix = (set, rel) => {
    return fillMatrix(set, rel, emptyMatrix(set));
}

const MatrixRender = ({ set, rel }) => {
    const mat = getMatrix(set, rel);
    return (
        <div className="table-responsive">
            <table
                className="table font-monospace"
                style={{
                    width: set.length * 30 + 100 + 'px',
                    borderColor: 'white'
                }}
            >
                <colgroup>
                    <col style={{ width: '50px' }}/>
                </colgroup>
                <thead>
                    <tr>
                        <th></th>
                        {set.map((item, index) => (
                            <th key={index}>
                                <span
                                    className="text-light bg-success px-2 py-1"
                                    style={{ borderRadius: '100%'}}
                                >
                                    {item}
                                </span>
                            </th>
                        ))}
                    </tr>
                </thead>
                <tbody>
                    {mat.map((line, rowIndex) => (
                        <tr key={rowIndex}>
                            {line.map((cell, cellIndex) => (
                                cellIndex == 0 ? 
                                <td key={cellIndex}>
                                    <span
                                        className="text-light bg-success px-2 py-1"
                                        style={{
                                            borderRadius: '100%',
                                            fontWeight: 'bold'
                                        }}
                                    >
                                        {cell}
                                    </span>
                                </td> :
                                <td
                                    key={cellIndex}
                                    className={
                                        cell === 1 ?
                                        "text-success bg-success-subtle" :
                                        "text-dark bg-light"
                                    }
                                    style={{
                                        borderRadius: "25%"
                                    }}
                                >
                                    {cell}
                                </td>
                            ))}
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};