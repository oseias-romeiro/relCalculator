
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
        for (const r of this.rel) {
            for (const r1 of this.rel) {
                const ar = [r[0], r1[1]];
                let found = false;
                for (const r2 of this.rel) {
                    if (JSON.stringify(r2) === JSON.stringify(ar)) {
                        found = true;
                        break;
                    }
                }
                if (!found) {
                    return false;
                }
            }
        }
        return true;
    }
}

