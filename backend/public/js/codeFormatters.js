/**
 * All code formetters are here
 */

const theme = {
    keyword: "#f5429b",
    string: "#8fc746",
    numbers: "#cce0b1"
}

class CodeFormatter {
    constructor() {
    }

    setKeywords(arr) {
        if (arr instanceof Array) {
            this.keywords = arr;
        } else {
            this.keywords = arr.split(/,|\|/);
        }
        return this;
    }

    format(str) {
        let temp = str;
        temp = temp.replaceAll(/\d/g, `<span style='color: ${theme.numbers};'>$&</span>`);
        temp = temp.replaceAll(this._arrayToRegex(this.keywords), `<span style='color: ${theme.keyword};'>$&</span>`);
        temp = temp.replaceAll(/"(.*?)"/g, `<span style='color: ${theme.string};'>$&</span>`)

        return temp;
    }

    _arrayToRegex(arr) {
        let str = "";
        for (const e of arr)
            str += e + "|";
        return new RegExp(`(${str.substr(0, str.length - 1)})`, "g");
    }
}


const JSFormatter = new CodeFormatter().setKeywords("function|return|new|class|const|var|let|for");
const CppFormatter = new CodeFormatter().setKeywords("int,float,double,bool,void,long,return,char,const,class," +
    "struct,namespace,using,auto,public,private,protected,friend,unsigned,new,nullptr,typedef," +
    "for,if,while,do,else");
