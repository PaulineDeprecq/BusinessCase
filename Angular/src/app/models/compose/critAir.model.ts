export class CritAir {
	private _id: number;
	private _certificate: number;

	constructor(id: number, certificate: number) {
		this._id = id;
		this._certificate = certificate;
	}

    /**
     * Getter id
     * @return {number}
     */
	public get id(): number {
		return this._id;
	}

    /**
     * Getter certificate
     * @return {number}
     */
	public get certificate(): number {
		return this._certificate;
	}

    /**
     * Setter certificate
     * @param {number} value
     */
	public set certificate(value: number) {
		this._certificate = value;
	}

	static fromJSON(data: any): CritAir {
		return new CritAir(
			data.id,
			data.certificate
		);
	}

	toJSON(): any {
		return {
			certificate: this.certificate
		}
	}
}