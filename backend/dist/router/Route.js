"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.Route = void 0;
class Route {
    constructor(url, method, controller, funcName) {
        this.url = url;
        this.method = method;
        this.controller = controller;
        this.funcName = funcName;
    }
    static get(url, controller, methodName) {
        const temp = new Route(url, "GET", controller, methodName);
        this.routes.push(temp);
        return temp;
    }
    static post(url, controller, methodName) {
        const temp = new Route(url, "POST", controller, methodName);
        this.routes.push(temp);
        return temp;
    }
}
exports.Route = Route;
Route.routes = [];
//# sourceMappingURL=Route.js.map