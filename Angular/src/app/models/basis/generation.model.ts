export class Generation {
	private _id: number;
	private _generation: string;

	constructor(id: number, generation: string) {
		this._id = id;
		this._generation = generation;
	}

    /**
     * Getter id
     * @return {number}
     */
	public get id(): number {
		return this._id;
	}

    /**
     * Getter generation
     * @return {string}
     */
	public get generation(): string {
		return this._generation;
	}

    /**
     * Setter generation
     * @param {string} value
     */
	public set generation(value: string) {
		this._generation = value;
	}

	static fromJSON(data: any): Generation {
		return new Generation(
			data.id,
			data.generation
		);
	}

	toJSON(): any {
		return {
			generation: this.generation
		}
	}
}