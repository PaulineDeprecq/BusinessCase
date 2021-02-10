export class Color {
	private _id: number;
	private _color: string;
	private _paintType: string;

	constructor(id: number, color: string, paintType: string) {
		this._id = id;
		this._color = color;
		this._paintType = paintType;
	}

    /**
     * Getter id
     * @return {number}
     */
	public get id(): number {
		return this._id;
	}

    /**
     * Getter color
     * @return {string}
     */
	public get color(): string {
		return this._color;
	}

    /**
     * Getter paintType
     * @return {string}
     */
	public get paintType(): string {
		return this._paintType;
	}

    /**
     * Setter color
     * @param {string} value
     */
	public set color(value: string) {
		this._color = value;
	}

    /**
     * Setter paintType
     * @param {string} value
     */
	public set paintType(value: string) {
		this._paintType = value;
	}

	static fromJSON(data: any): Color {
		return new Color(
			data.id,
			data.color,
			data.paintType
		);
	}

	toJSON(): any {
		return {
			color: this.color,
			paintType: this.paintType
		}
	}
}