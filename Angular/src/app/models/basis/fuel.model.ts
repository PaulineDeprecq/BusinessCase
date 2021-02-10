export class Fuel {
	private _id: number;
	private _type: string;

	constructor(id: number, type: string) {
		this._id = id;
		this._type = type;
	}

    /**
     * Getter id
     * @return {number}
     */
	public get id(): number {
		return this._id;
	}

    /**
     * Getter type
     * @return {string}
     */
	public get type(): string {
		return this._type;
	}

    /**
     * Setter type
     * @param {string} value
     */
	public set type(value: string) {
		this._type = value;
	}

	static fromJSON(data: any): Fuel {
		return new Fuel(
			data._id,
			data.type
		);
	}

	toJSON(): any {
		return {
			type: this.type
		}
	}
}