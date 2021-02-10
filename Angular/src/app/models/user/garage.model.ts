import { Address } from './address.model';

export class Garage {
	private _id: number;
	private _name: string;
	private _phoneNumber: string;
	private _address: Address;

	constructor(id: number, name: string, phoneNumber: string, address: Address) {
		this._id = id;
		this._name = name;
		this._phoneNumber = phoneNumber;
		this._address = address;
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
     * Getter phoneNumber
     * @return {string}
     */
	public get phoneNumber(): string {
		return this._phoneNumber;
	}

    /**
     * Getter address
     * @return {Address}
     */
	public get address(): Address {
		return this._address;
	}

    /**
     * Setter name
     * @param {string} value
     */
	public set name(value: string) {
		this._name = value;
	}

    /**
     * Setter phoneNumber
     * @param {string} value
     */
	public set phoneNumber(value: string) {
		this._phoneNumber = value;
	}

    /**
     * Setter address
     * @param {Address} value
     */
	public set address(value: Address) {
		this._address = value;
	}

	static fromJSON(data: any): Garage {
		return new Garage(
			data.id,
			data.name,
			data.phoneNumber,
			Address.fromJSON(data.address)
		);
	}

	toJSON(): any {
		return {
			name: this.name,
			phoneNumber: this.phoneNumber,
			address: this.address.toJSON()
		}
	}
}