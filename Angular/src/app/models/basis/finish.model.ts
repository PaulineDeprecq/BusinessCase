export class Finish {
	private _id: number;
	private _name: string;

	constructor(id: number, name: string) {
		this._id = id;
		this._name = name;
	}

    /**
     * Getter id
     * @return {number}
     */
	public get id(): number {
		return this._id;
	}

    /**
     * Getter name
     * @return {string}
     */
	public get name(): string {
		return this._name;
	}

    /**
     * Setter id
     * @param {number} value
     */
	public set id(value: number) {
		this._id = value;
	}

    /**
     * Setter name
     * @param {string} value
     */
	public set name(value: string) {
		this._name = value;
	}

	static fromJSON(data: any): Finish {
		return new Finish(
			data.id,
			data.name
		);
	}

	toJSON(): any {
		return {
			name: this.name
		}
	}
}