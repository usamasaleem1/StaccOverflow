"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
const TestController_1 = require("../controllers/TestController");
const Route_1 = require("./Route");
Route_1.Route.get("/", TestController_1.TestController, "index");
Route_1.Route.get("/user", TestController_1.TestController, "user");
//# sourceMappingURL=web.js.map