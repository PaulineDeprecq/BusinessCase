export class User {
	private _id: number;
	private _email: string;
	private _password: string;
	private _firstname: string;
	private _lastname: string;
	private _phoneNumber: string;
	private _siret: string;
	private _username: string;
	private _isValidate: boolean;

	constructor(
		firstname: string, lastname: string, email: string, password: string, 
		phoneNumber: string, siret: string, username: string, isValidate: boolean) {

		this._email = email;
		this._password = password;
		this._firstname = firstname;
		this._lastname = lastname;
		this._phoneNumber = phoneNumber;
		this._siret = siret;
		this._username = username;
		this._isValidate = isValidate;
	}

    /**
     * Getter id
     * @return {number}
     */
	public get id(): number {
		return this._id;
	}

    /**
     * Getter email
     * @return {string}
     */
	public get email(): string {
		return this._email;
	}

    /**
     * Getter password
     * @return {string}
     */
	public get password(): string {
		return this._password;
	}

    /**
     * Getter firstname
     * @return {string}
     */
	public get firstname(): string {
		return this._firstname;
	}

    /**
     * Getter lastname
     * @return {string}
     */
	public get lastname(): string {
		return this._lastname;
	}

    /**
     * Getter phoneNumber
     * @return {string}
     */
	public get phoneNumber(): string {
		return this._phoneNumber;
	}

    /**
     * Getter siret
     * @return {string}
     */
	public get siret(): string {
		return this._siret;
	}

    /**
     * Getter username
     * @return {string}
     */
	public get username(): string {
		return this._username;
	}

    /**
     * Getter isValidate
     * @return {boolean}
     */
	public get isValidate(): boolean {
		return this._isValidate;
	}

    /**
     * Setter email
     * @param {string} value
     */
	public set email(value: string) {
		this._email = value;
	}

    /**
     * Setter password
     * @param {string} value
     */
	public set password(value: string) {
		this._password = value;
	}

    /**
     * Setter firstname
     * @param {string} value
     */
	public set firstname(value: string) {
		this._firstname = value;
	}

    /**
     * Setter lastname
     * @param {string} value
     */
	public set lastname(value: string) {
		this._lastname = value;
	}

    /**
     * Setter phoneNumber
     * @param {string} value
     */
	public set phoneNumber(value: string) {
		this._phoneNumber = value;
	}

    /**
     * Setter siret
     * @param {string} value
     */
	public set siret(value: string) {
		this._siret = value;
	}

    /**
     * Setter username
     * @param {string} value
     */
	public set username(value: string) {
		this._username = value;
	}

    /**
     * Setter isValidate
     * @param {boolean} value
     */
	public set isValidate(value: boolean) {
		this._isValidate = value;
	}

	static fromJSON(data: any): User {
		return new User(
			data.email,
			data.password,
			data.firstname,
			data.lastname,
			data.phoneNumber,
			data.siret,
			data.username,
			data.isValidate
		);
	}

	toJSON(): any {
		return {
			id: this._id, 
			email: this._email, 
			password: this._password, 
			firstname: this._firstname, 
			lastname: this._lastname, 
			phoneNumber: this._phoneNumber, 
			siret: this._siret, 
			username: this._username, 
			isValidate: this._isValidate,
		}
	}
}