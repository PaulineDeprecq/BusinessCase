export class Address {
	private _id: number;
	private _firstLine: string;
	private _secondLine: string;
	private _thirdLine: string;
	private _town: string;
	private _postCode: string;

	constructor(id: number, firstLine: string, secondLine: string = '', thirdLine: string = '', town: string, postCode: string) {
		this._id = id;
		this._firstLine = firstLine;
		this._secondLine = secondLine;
		this._thirdLine = thirdLine;
		this._town = town;
		this._postCode = postCode;
	}

    /**
     * Getter id
     * @return {number}
     */
	public get id(): number {
		return this._id;
	}

    /**
     * Getter firstLine
     * @return {string}
     */
	public get firstLine(): string {
		return this._firstLine;
	}

    /**
     * Getter secondLine
     * @return {string}
     */
	public get secondLine(): string {
		return this._secondLine;
	}

    /**
     * Getter thirdLine
     * @return {string}
     */
	public get thirdLine(): string {
		return this._thirdLine;
	}

    /**
     * Getter town
     * @return {string}
     */
	public get town(): string {
		return this._town;
	}

    /**
     * Getter postCode
     * @return {string}
     */
	public get postCode(): string {
		return this._postCode;
	}

    /**
     * Setter firstLine
     * @param {string} value
     */
	public set firstLine(value: string) {
		this._firstLine = value;
	}

    /**
     * Setter secondLine
     * @param {string} value
     */
	public set secondLine(value: string) {
		this._secondLine = value;
	}

    /**
     * Setter thirdLine
     * @param {string} value
     */
	public set thirdLine(value: string) {
		this._thirdLine = value;
	}

    /**
     * Setter town
     * @param {string} value
     */
	public set town(value: string) {
		this._town = value;
	}

    /**
     * Setter postCode
     * @param {string} value
     */
	public set postCode(value: string) {
		this._postCode = value;
	}

	static fromJSON(data: any): Address {
		return new Address(
			data.id,
			data.firstLine,
			data.secondLine,
			data.thirdLine,
			data.town,
			data.postCode
		);
	}

	toJSON(): any {
		return {
			firstLine: this.firstLine,
			secondLine: this.secondLine,
			thirdLine: this.thirdLine,
			town: this.town,
			postCode: this.postCode
		}
	}
}