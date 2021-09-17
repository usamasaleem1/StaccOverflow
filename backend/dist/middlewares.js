"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.authMiddleware = void 0;
function authMiddleware() {
    return (req, res, next) => {
        next();
    };
}
exports.authMiddleware = authMiddleware;
//# sourceMappingURL=middlewares.js.map