
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
    let matrix2 = [];
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

const matrixGen = (set, rel)=>{
    //matrix empty
    let matrix = emptyMatrix(set);
    //matrix fill
    matrix = fillMatrix(set, rel, matrix);
    return matrix;
}
