
class Relations {

    constructor(set, rel) {
        this.set = set;
        this.rel = rel;
    }

    isReflexive() {
        const equalXY = [];
        for (const r of this.rel) {
            if (r[0] === r[1]) {
                equalXY.push(r[0]);
            }
        }
        return equalXY.length === this.set.length;
    }

    isSymmetric() {
        let dyagonal = true;
        let find = false;
        for (const r of this.rel) {
            if (r[0] !== r[1]) {
                dyagonal = false;
                find = false;
                for (const r2 of this.rel) {
                    if (r[0] === r2[1] && r[1] === r2[0]) {
                        find = true;
                    }
                }
                if (!find) {
                    break;
                }
            }
        }
        return dyagonal ? dyagonal : find;
    }

    isAntisymmetric() {
        let dyagonal = true;
        let find = false;
        for (const r of this.rel) {
            if (r[0] !== r[1]) {
                dyagonal = false;
                find = false;
                for (const r2 of this.rel) {
                    if (r[0] === r2[1] && r[1] === r2[0]) {
                        find = true;
                        break;
                    }
                }
                if (find) {
                    break;
                }
            }
        }
        return dyagonal ? dyagonal : !find;
    }

    isTransitive() {
        let relation = this.rel;

        if (relation.length === 0) {
            return true;
        }
    
        const elements = this.set;
    
        for (const x of elements) {
            for (const y of elements) {
                if (Array.from(elements).some(z =>
                    relation.some(pair => pair[0] === x && pair[1] === z) 
                    && relation.some(pair => pair[0] === z && pair[1] === y))
                    && !relation.some(pair => pair[0] === x && pair[1] === y)
                ) {
                    console.log("is not transitive, because not found pair", x, y);
                    return false;
                }
            }
        }
        return true;
    }
    
}

