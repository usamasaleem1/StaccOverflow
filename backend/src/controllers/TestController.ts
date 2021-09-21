/**
 *
 */

import { Request, Response } from "express";
import { Constroller } from "./Controller";

export class TestController extends Constroller {
	public index(request: Request, response: Response) {
		response.send("LULW!");
	}

	public user(request: Request, response: Response) {
		response.send({ name: "admin", password: "admin32532" });
	}
}
