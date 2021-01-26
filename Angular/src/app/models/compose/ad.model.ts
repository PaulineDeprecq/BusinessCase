import { Garage } from '../user/garage.model';
import { Opzione } from './opzione.model';
import { CritAir } from './critAir.model';
import { Fuel } from '../basis/fuel.model';
import { Color } from '../basis/color.model';
import { Car } from './car.model';

export class Ad {
	private _id: number;
	private _title: string;
	private _body: string;
	private _circulationDate: Date;
	private _mileage: number;
	private _price: number;
	private _reference: string;
	private _publishedAt: Date;
	private _updatedAt: Date;
	private _hasFiveDoors: boolean;
	private _hasMechanicalGearbox: boolean;
	private _CO2emission: number;
	private _seatNbr: number;
	private _speedNbr: number;
	private _consumptionL100: number;
	private _isLeatherUpholstery: boolean;
	private _displacement: number;
	private _dinPower: number;
	private _fiscalPower: number;
	private _maxSpeed: number;
	private _acceleration: number;
	private _fuel: Fuel;
	private _color: Color;
	private _car: Car;
	private _critairCertificate: CritAir;
	private _options: Array<Opzione>;
	private _garage: Garage;

	constructor(id: number, title: string, body: string, circulationDate: Date, mileage: number, price: number, reference: string, publishedAt: Date, updatedAt: Date, hasFiveDoors: boolean, hasMechanicalGearbox: boolean, CO2emission: number, seatNbr: number, speedNbr: number, consumptionL100: number, isLeatherUpholstery: boolean, displacement: number, dinPower: number, fiscalPower: number, maxSpeed: number, acceleration: number, fuel: Fuel, color: Color, car: Car, critairCertificate: CritAir, options: Array<Opzione>, garage: Garage) {
		this._id = id;
		this._title = title;
		this._body = body;
		this._circulationDate = circulationDate;
		this._mileage = mileage;
		this._price = price;
		this._reference = reference;
		this._publishedAt = publishedAt;
		this._updatedAt = updatedAt;
		this._hasFiveDoors = hasFiveDoors;
		this._hasMechanicalGearbox = hasMechanicalGearbox;
		this._CO2emission = CO2emission;
		this._seatNbr = seatNbr;
		this._speedNbr = speedNbr;
		this._consumptionL100 = consumptionL100;
		this._isLeatherUpholstery = isLeatherUpholstery;
		this._displacement = displacement;
		this._dinPower = dinPower;
		this._fiscalPower = fiscalPower;
		this._maxSpeed = maxSpeed;
		this._acceleration = acceleration;
		this._fuel = fuel;
		this._color = color;
		this._car = car;
		this._critairCertificate = critairCertificate;
		this._options = options;
		this._garage = garage;
	}

    /**
     * Getter id
     * @return {number}
     */
	public get id(): number {
		return this._id;
	}

    /**
     * Getter title
     * @return {string}
     */
	public get title(): string {
		return this._title;
	}

    /**
     * Getter body
     * @return {string}
     */
	public get body(): string {
		return this._body;
	}

    /**
     * Getter circulationDate
     * @return {Date}
     */
	public get circulationDate(): Date {
		return this._circulationDate;
	}

    /**
     * Getter mileage
     * @return {number}
     */
	public get mileage(): number {
		return this._mileage;
	}

    /**
     * Getter price
     * @return {number}
     */
	public get price(): number {
		return this._price;
	}

    /**
     * Getter reference
     * @return {string}
     */
	public get reference(): string {
		return this._reference;
	}

    /**
     * Getter publishedAt
     * @return {Date}
     */
	public get publishedAt(): Date {
		return this._publishedAt;
	}

    /**
     * Getter updatedAt
     * @return {Date}
     */
	public get updatedAt(): Date {
		return this._updatedAt;
	}

    /**
     * Getter hasFiveDoors
     * @return {boolean}
     */
	public get hasFiveDoors(): boolean {
		return this._hasFiveDoors;
	}

    /**
     * Getter hasMechanicalGearbox
     * @return {boolean}
     */
	public get hasMechanicalGearbox(): boolean {
		return this._hasMechanicalGearbox;
	}

    /**
     * Getter CO2emission
     * @return {number}
     */
	public get CO2emission(): number {
		return this._CO2emission;
	}

    /**
     * Getter seatNbr
     * @return {number}
     */
	public get seatNbr(): number {
		return this._seatNbr;
	}

    /**
     * Getter speedNbr
     * @return {number}
     */
	public get speedNbr(): number {
		return this._speedNbr;
	}

    /**
     * Getter consumptionL100
     * @return {number}
     */
	public get consumptionL100(): number {
		return this._consumptionL100;
	}

    /**
     * Getter isLeatherUpholstery
     * @return {boolean}
     */
	public get isLeatherUpholstery(): boolean {
		return this._isLeatherUpholstery;
	}

    /**
     * Getter displacement
     * @return {number}
     */
	public get displacement(): number {
		return this._displacement;
	}

    /**
     * Getter dinPower
     * @return {number}
     */
	public get dinPower(): number {
		return this._dinPower;
	}

    /**
     * Getter fiscalPower
     * @return {number}
     */
	public get fiscalPower(): number {
		return this._fiscalPower;
	}

    /**
     * Getter maxSpeed
     * @return {number}
     */
	public get maxSpeed(): number {
		return this._maxSpeed;
	}

    /**
     * Getter acceleration
     * @return {number}
     */
	public get acceleration(): number {
		return this._acceleration;
	}

    /**
     * Getter fuel
     * @return {Fuel}
     */
	public get fuel(): Fuel {
		return this._fuel;
	}

    /**
     * Getter color
     * @return {Color}
     */
	public get color(): Color {
		return this._color;
	}

    /**
     * Getter car
     * @return {Car}
     */
	public get car(): Car {
		return this._car;
	}

    /**
     * Getter critairCertificate
     * @return {CritAir}
     */
	public get critairCertificate(): CritAir {
		return this._critairCertificate;
	}

    /**
     * Getter options
     * @return {Array<Opzione>}
     */
	public get options(): Array<Opzione> {
		return this._options;
	}

    /**
     * Getter garage
     * @return {Garage}
     */
	public get garage(): Garage {
		return this._garage;
	}

    /**
     * Setter title
     * @param {string} value
     */
	public set title(value: string) {
		this._title = value;
	}

    /**
     * Setter body
     * @param {string} value
     */
	public set body(value: string) {
		this._body = value;
	}

    /**
     * Setter circulationDate
     * @param {Date} value
     */
	public set circulationDate(value: Date) {
		this._circulationDate = value;
	}

    /**
     * Setter mileage
     * @param {number} value
     */
	public set mileage(value: number) {
		this._mileage = value;
	}

    /**
     * Setter price
     * @param {number} value
     */
	public set price(value: number) {
		this._price = value;
	}

    /**
     * Setter reference
     * @param {string} value
     */
	public set reference(value: string) {
		this._reference = value;
	}

    /**
     * Setter updatedAt
     * @param {Date} value
     */
	public set updatedAt(value: Date) {
		this._updatedAt = value;
	}

    /**
     * Setter hasFiveDoors
     * @param {boolean} value
     */
	public set hasFiveDoors(value: boolean) {
		this._hasFiveDoors = value;
	}

    /**
     * Setter hasMechanicalGearbox
     * @param {boolean} value
     */
	public set hasMechanicalGearbox(value: boolean) {
		this._hasMechanicalGearbox = value;
	}

    /**
     * Setter CO2emission
     * @param {number} value
     */
	public set CO2emission(value: number) {
		this._CO2emission = value;
	}

    /**
     * Setter seatNbr
     * @param {number} value
     */
	public set seatNbr(value: number) {
		this._seatNbr = value;
	}

    /**
     * Setter speedNbr
     * @param {number} value
     */
	public set speedNbr(value: number) {
		this._speedNbr = value;
	}

    /**
     * Setter consumptionL100
     * @param {number} value
     */
	public set consumptionL100(value: number) {
		this._consumptionL100 = value;
	}

    /**
     * Setter isLeatherUpholstery
     * @param {boolean} value
     */
	public set isLeatherUpholstery(value: boolean) {
		this._isLeatherUpholstery = value;
	}

    /**
     * Setter displacement
     * @param {number} value
     */
	public set displacement(value: number) {
		this._displacement = value;
	}

    /**
     * Setter dinPower
     * @param {number} value
     */
	public set dinPower(value: number) {
		this._dinPower = value;
	}

    /**
     * Setter fiscalPower
     * @param {number} value
     */
	public set fiscalPower(value: number) {
		this._fiscalPower = value;
	}

    /**
     * Setter maxSpeed
     * @param {number} value
     */
	public set maxSpeed(value: number) {
		this._maxSpeed = value;
	}

    /**
     * Setter acceleration
     * @param {number} value
     */
	public set acceleration(value: number) {
		this._acceleration = value;
	}

    /**
     * Setter fuel
     * @param {Fuel} value
     */
	public set fuel(value: Fuel) {
		this._fuel = value;
	}

    /**
     * Setter color
     * @param {Color} value
     */
	public set color(value: Color) {
		this._color = value;
	}

    /**
     * Setter car
     * @param {Car} value
     */
	public set car(value: Car) {
		this._car = value;
	}

    /**
     * Setter critairCertificate
     * @param {CritAir} value
     */
	public set critairCertificate(value: CritAir) {
		this._critairCertificate = value;
	}

    /**
     * Setter options
     * @param {Array<Opzione>} value
     */
	public set options(value: Array<Opzione>) {
		this._options = value;
	}

    /**
     * Setter garage
     * @param {Garage} value
     */
	public set garage(value: Garage) {
		this._garage = value;
	}

	toPlainObj() {
		return {
			id: this._id,
			title: this._title,
			body: this._body,
			circulationDate: this._circulationDate,
			mileage: this._mileage,
			price: this._price,
			reference: this._reference,
			publishedAt: this._publishedAt,
			updatedAt: this._updatedAt,
			hasFiveDoors: this._hasFiveDoors,
			hasMechanicalGearbox: this._hasMechanicalGearbox,
			CO2emission: this._CO2emission,
			seatNbr: this._seatNbr,
			speedNbr: this._speedNbr,
			consumptionL100: this._consumptionL100,
			isLeatherUpholstery: this._isLeatherUpholstery,
			displacement: this._displacement,
			dinPower: this._dinPower,
			fiscalPower: this._fiscalPower,
			maxSpeed: this._maxSpeed,
			acceleration: this._acceleration,
			fuel: this._fuel,
			color: this._color,
			car: this._car,
			critairCertificate: this._critairCertificate,
			options: this._options,
			garage: this._garage
		}
	}
}