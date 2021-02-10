export class Opzione {
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
     * Setter name
     * @param {string} value
     */
	public set name(value: string) {
		this._name = value;
	}

	static fromJSON(data: any): Opzione {
		return new Opzione(
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