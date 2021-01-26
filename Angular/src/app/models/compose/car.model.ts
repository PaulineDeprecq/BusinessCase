import { Model } from './../basis/model.model';
import { Version } from './../basis/version.model';
import { Generation } from './../basis/generation.model';

export class Car {
	private _id: number;
	private _generation: Generation;
	private _version: Version;
	private _model: Model;

	constructor(id: number, generation: Generation, version: Version, model: Model) {
		this._id = id;
		this._generation = generation;
		this._version = version;
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

}