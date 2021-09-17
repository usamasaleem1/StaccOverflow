/**
 * Here we store all app middlewares
 */
import { Express } from "express";

export function authMiddleware() {
	return (req: Express.Request, res: Express.Response, next: any) => {
		// Here we should verify that the request has the correct token

		// Request is valide
		next();
	};
}
