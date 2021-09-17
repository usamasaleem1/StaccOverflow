"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
require("reflect-metadata");
const express_1 = __importDefault(require("express"));
const typeorm_1 = require("typeorm");
const User_1 = require("./models/User");
const dotenv_1 = __importDefault(require("dotenv"));
async function main() {
    dotenv_1.default.config();
    const PORT = process.env.APP_PORT;
    const app = (0, express_1.default)();
    const connection = await (0, typeorm_1.createConnection)({
        type: "mysql",
        host: process.env.DB_HOST,
        port: Number(process.env.DB_PORT || 3306),
        username: process.env.DB_USERNAME,
        password: process.env.DB_PASSWORD,
        database: process.env.DB_NAME,
        synchronize: true,
        entities: [User_1.User],
    });
    app.get("/", (req, res) => res.send("Hello this is the index API route!"));
    app.listen(PORT, () => console.log(`Server is listening to http://localhost:${PORT}/`));
}
main().catch((e) => console.error(e));
//# sourceMappingURL=index.js.map