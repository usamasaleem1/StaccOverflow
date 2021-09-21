"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.TestController = void 0;
const Controller_1 = require("./Controller");
class TestController extends Controller_1.Constroller {
    index(request, response) {
        response.send("LULW!");
    }
    user(request, response) {
        response.send({ name: "admin", password: "admin32532" });
    }
}
exports.TestController = TestController;
//# sourceMappingURL=TestController.js.map