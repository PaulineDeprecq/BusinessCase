import { Builder } from './builder.model';
export class Model {
	private _id: number;
	private _name: string;
	private _builder: Builder;

	constructor(id: number, name: string, builder: Builder) {
		this._id = id;
		this._name = name;
		this._builder = builder;
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
     * Getter builder
     * @return {Builder}
     */
	public get builder(): Builder {
		return this._builder;
	}

    /**
     * Setter name
     * @param {string} value
     */
	public set name(value: string) {
		this._name = value;
	}

    /**
     * Setter builder
     * @param {Builder} value
     */
	public set builder(value: Builder) {
		this._builder = value;
	}

}