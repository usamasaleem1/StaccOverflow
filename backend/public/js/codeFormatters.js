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

    addKeywords(arr) {
        if (arr instanceof Array) {
            this.keywords = [...this.keywords, ...arr];
        } else {
            this.keywords = [...this.keywords, ...arr.split(/,|\|/)];
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

    getKeywords() {
        return this.keywords;
    }

    _arrayToRegex(arr) {
        let str = "";
        for (const e of arr)
            str += e + "|";
        return new RegExp(`(${str.substr(0, str.length - 1)})`, "g");
    }
}


const JSFormatter = new CodeFormatter().setKeywords("function,return,if,else,for,while,do,of,in,let,var,const,new,class,extends,import,as,try,catch,finally," +
    "throw,continue,break,yield,super,async,await,null,undefined,void,switch,case");
const CFormatter = new CodeFormatter().setKeywords("int,float,double,bool,void,long,return,char,const,volatile,extern,unsigned,for,if,while,do,else" +
    "struct,typedef,break,continue,union,goto,switch,case,default");
const CppFormatter = new CodeFormatter().setKeywords("class," +
    "namespace,using,auto,public,private,protected,friend,new,nullptr,try,catch,throw,template,typename,requires,co_await,co_yield").addKeywords(CFormatter.getKeywords());

const PythonFormatter = new CodeFormatter().setKeywords("def,class,return,if,elif,else,try,except,raise,import,finally,as,and," +
    "or,break,for,in,from,None,pass,False,True,while,with,yield,global,lambda,not,is,assert")

const JavaFormetter = new CodeFormatter().setKeywords("int,float,double,char,short,byte,boolean,class,extends,interface,implements," +
    "public,private,protected,volatile,final,for,while,do,if,else,try,catch,finally,static,native,package,import,abstract,var,return,null,throw,throws," +
    "switch,case,default,continue,break,super,new")

/**
 * This map is important
 */
const LANG_TO_FORMATTER = {
    "javascript": JSFormatter,
    "c": CFormatter,
    "c++": CppFormatter,
    "python": PythonFormatter,
    "java": JavaFormetter
}
