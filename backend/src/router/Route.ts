/**
 *
 */

import { Constroller } from "src/controllers/Controller";

export class Route {
	public static readonly routes: Route[] = [];

	constructor(
		public readonly url: string,
		public readonly method: "GET" | "POST",
		public readonly controller: new () => Constroller,
		public readonly funcName: string
	) {}

	public static get(
		url: string,
		controller: new () => Constroller,
		methodName: string
	) {
		const temp = new Route(url, "GET", controller, methodName);
		this.routes.push(temp);
		return temp;
	}

	public static post(
		url: string,
		controller: new () => Constroller,
		methodName: string
	) {
		const temp = new Route(url, "POST", controller, methodName);
		this.routes.push(temp);
		return temp;
	}
}
