/**
 * Every controller should extend this class
 */

/*abstract*/
export class Constroller {
    constructor() {
        if (target.new == this) {
            throw new Error("Cannot instantiate Abstract class Controller");
        }
    }
}