import { Finish } from './../basis/finish.model';
import { Model } from './../basis/model.model';
import { Version } from './../basis/version.model';
import { Generation } from './../basis/generation.model';

export class Car {
	private _id: number;
	private _generation: Generation;
	private _version: Version;
	private _finishs: Array<Finish>;
	private _model: Model;

	constructor(id: number, generation: Generation, version: Version, finishs: Array<Finish>, model: Model) {
		this._id = id;
		this._generation = generation;
		this._version = version;
		this._finishs = finishs;
		this._model = model;
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
     * @return {Generation}
     */
	public get generation(): Generation {
		return this._generation;
	}

    /**
     * Getter version
     * @return {Version}
     */
	public get version(): Version {
		return this._version;
	}

    /**
     * Getter model
     * @return {Model}
     */
	public get model(): Model {
		return this._model;
	}

    /**
     * Setter generation
     * @param {Generation} value
     */
	public set generation(value: Generation) {
		this._generation = value;
	}

    /**
     * Setter version
     * @param {Version} value
     */
	public set version(value: Version) {
		this._version = value;
	}

    /**
     * Setter model
     * @param {Model} value
     */
	public set model(value: Model) {
		this._model = value;
	}

    /**
     * Getter finishs
     * @return {Array<Finish>}
     */
	public get finishs(): Array<Finish> {
		return this._finishs;
	}

    /**
     * Setter finishs
     * @param {Array<Finish>} value
     */
	public set finishs(value: Array<Finish>) {
		this._finishs = value;
	}

	static fromJSON(data: any): Car {
		return new Car(
			data.id,
			Generation.fromJSON(data.generation),
			Version.fromJSON(data.version),
			data.finishs.map((finish: any) => Finish.fromJSON(finish)),
			Model.fromJSON(data.model)
		);
	}

	toJSON(): any {
		return {
			generation: this.generation.toJSON(),
			version: this.version.toJSON(),
			finishs: this.finishs.map((finish: any) => finish.toJSON()),
			model: this.model.toJSON()
		}
	}
}