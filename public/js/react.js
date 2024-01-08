
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
const App = ()=>{
    const [set, setSet] = React.useState(null);
    const [rel, setRel] = React.useState(null);
    const [result, setResult] = React.useState(null);

    const submit = ()=>{

        console.log("set: ", set);
        console.log("relation: ", rel);
    
        resultObj = new Relations(set, rel);
        setResult(resultObj);
    }

    const handlerSetInput = (e)=>{
        setSet(tansformer(e.target.value, 'set'));
    }
    const handlerRelInput = (e)=>{
        setRel(tansformer(e.target.value, 'relation'));
    }

    const form = React.createElement('form', null,
        React.createElement('label', null, 'Set:'),
        React.createElement('input', {onChange: handlerSetInput, id: 'set', type: 'text', className: 'form-control', placeholder: '1,2,3,4', required: true}),
        React.createElement('label', null, 'Relation:'),
        React.createElement('input', {onChange: handlerRelInput, id: 'relation', type: 'text', className: 'form-control', placeholder: '1,1 2,2 3,3 4,4', required: true}),
        React.createElement('button', {onClick: submit, className: 'btn btn-success mt-2', type: 'button', style: {width: '100%'}}, 'submit'),
    )

    return React.createElement('div', {'className': 'row'},
        React.createElement('div', {'className': 'col-6'}, form),
        result == null ? ''
        : React.createElement('div', {'className': 'col-3'},
            React.createElement('p', null, result.isReflexive() ? 'is reflexive' : 'is not reflexive'),
            React.createElement('p', null, result.isSymmetric() ? 'is symmetric' : 'is not symmetric'),
            React.createElement('p', null, result.isAntisymmetric() ? 'is antisymmetric' : 'is not antisymmetric'),
            React.createElement('p', null, result.isTransitive() ? 'is transitive' : 'is not transitive'),
        ),
        React.createElement('div', {'className': 'col-3'},
            /* matrix */
        ),
    ); 
}

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(React.createElement(App));
