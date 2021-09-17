"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
require("reflect-metadata");
const express_1 = __importDefault(require("express"));
const typeorm_1 = require("typeorm");
const User_1 = require("./models/User");
async function main() {
    const PORT = 7000;
    const app = (0, express_1.default)();
    const connection = await (0, typeorm_1.createConnection)({
        type: "mysql",
        host: "localhost",
        port: 3306,
        username: "root",
        password: "",
        database: "soen341",
        synchronize: true,
        entities: [User_1.User],
    });
    app.get("/", (req, res) => res.send("Hello this is the index API route!"));
    app.listen(PORT, () => console.log(`Server is listening to http://localhost:${PORT}/`));
}
main().catch((e) => console.error(e));
//# sourceMappingURL=index.js.map