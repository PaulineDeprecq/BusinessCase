import { FuelService } from './../../services/basis/fuel/fuel.service';
import { ModelService } from './../../services/basis/model/model.service';
import { AdService } from './../../services/compose/ad/ad.service';
import { BuilderService } from './../../services/basis/builder/builder.service';
import { Subscription } from 'rxjs';
import { Options } from '@angular-slider/ngx-slider';
import { Component, OnDestroy, OnInit } from '@angular/core';
import { Builder } from 'src/app/models/basis/builder.model';
import { Model } from 'src/app/models/basis/model.model';
import { Fuel } from 'src/app/models/basis/fuel.model';

@Component({
  selector: 'app-research',
  templateUrl: './research.component.html',
  styleUrls: ['./research.component.css']
})
export class ResearchComponent implements OnInit, OnDestroy {

  yearValue: number = 1950;
  yearMaxValue: number = new Date().getFullYear();
  yearOptions: Options = {
    floor: 1950,
    ceil: new Date().getFullYear()
  };
  
  priceValue: number = 0;
  priceMaxValue: number = 100000;
  priceOptions: Options = {
    floor: 0,
    ceil: 100000,
    step: 50
  };

  builders: Array<Builder>;
  buildersSub: Subscription;

  builder: string;
  builderSub: Subscription;

  models: Array<Model>;
  modelsSub: Subscription;

  model: string;
  modelSub: Subscription;

  modelsForBuilderID: Array<Model>;

  fuels: Array<Fuel>;
  fuelsSub: Subscription;

  fuel: string;
  fuelSub: Subscription;

  yearMin: string;
  yearMax: string;

  priceMin: number;
  priceMax: number;

  constructor(private adService: AdService,
              private builderService: BuilderService,
              private modelService: ModelService,
              private fuelService: FuelService) {
    this.modelsForBuilderID = [];
  }

  ngOnInit(): void {
    this.builderService.getBuilders();
    this.modelService.getModels();
    this.fuelService.getFuels();
    this._initSubs();
  }

  _initSubs() {
    this.builderSub = this.adService.builder.subscribe(
      (builder: string) => this.builder = builder
    );
    this.buildersSub = this.builderService.builders.subscribe(
      (builders: Array<Builder>) => this.builders = builders
    );
    this.builderSub = this.adService.builder.subscribe(
      (builder: string) => this.builder = builder
    );
    this.modelsSub = this.modelService.models.subscribe(
      (models: Array<Model>) => this.models = models
    );
    this.modelSub = this.adService.model.subscribe(
      (model: string) => this.model = model
    );
    this.fuelsSub = this.fuelService.fuels.subscribe(
      (fuels: Array<Fuel>) => this.fuels = fuels
    );
    this.fuelSub = this.adService.fuel.subscribe(
      (fuel: string) => this.fuel = fuel
    );
  }

  ngOnDestroy() {
    this.buildersSub.unsubscribe();
    this.builderSub.unsubscribe();
    this.modelsSub.unsubscribe();
    this.modelSub.unsubscribe();
    this.fuelsSub.unsubscribe();
    this.fuelSub.unsubscribe();
  }

  /**
   * Method used to filter the ads
   * @param attr 
   */
  onClickFilterBy(attr: Array<any>) {
    //! MILEAGE !\\
    switch(attr[0]) {
      case 'builder':
        this.builder = attr[1];
        this.model = '';
        this.getModelsForBuilderID(attr[1]);
        break;
      case 'model':
        this.model = attr[1];
        break;
      case 'fuel':
        this.fuel = attr[1];
        break;
      case 'year':
        this.yearMin = attr[1];
        this.yearMax = attr[2];
        break;
      case 'price':
        this.priceMin = +attr[1];
        this.priceMax = +attr[2];
        break;
      case 'all':
        if(attr[1] === 'builders') {
          this.builder = '';
          this.model = '';
          this.modelsForBuilderID.splice(0, this.modelsForBuilderID.length);
        }
        if(attr[1] === 'models') this.model = '';
        if(attr[1] === 'fuels') this.fuel = '';
      case 'reset':
        this.adService.adsPerPage.next(10);
        this.builder = '';
        this.model = '';
        this.modelsForBuilderID.splice(0, this.modelsForBuilderID.length);
        this.fuel = '';
        this.yearMin = '1950';
        this.yearMax = '';
        this.yearMax += new Date().getFullYear();
        this.priceMin = 0;
        this.priceMax = 100000;
    }
    
    this.adService.getAds(1, this.adService.adsPerPage.getValue(), this.builder, this.model, this.fuel, this.yearMin, +this.yearMax, this.priceMin, this.priceMax);
  }

  getModelsForBuilderID(builder: string) {
    this.modelsForBuilderID = this.models.filter(model => model.builder.name === builder);
  }
}
