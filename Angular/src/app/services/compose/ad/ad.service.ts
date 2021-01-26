import { UtilService } from './../../util/util.service';
import { Opzione } from './../../../models/compose/opzione.model';
import { Ad } from './../../../models/compose/ad.model';
import { Injectable } from '@angular/core';
import { Fuel } from 'src/app/models/basis/fuel.model';
import { Color } from 'src/app/models/basis/color.model';
import { Car } from 'src/app/models/compose/car.model';
import { CritAir } from 'src/app/models/compose/critAir.model';
import { Garage } from 'src/app/models/user/garage.model';
import { BehaviorSubject } from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { Generation } from 'src/app/models/basis/generation.model';
import { Version } from 'src/app/models/basis/version.model';
import { Model } from 'src/app/models/basis/model.model';
import { Builder } from 'src/app/models/basis/builder.model';

@Injectable({
  providedIn: 'root'
})
export class AdService {
  apiUrl: string;
  ads: BehaviorSubject<Array<Ad>>;
  totalAds: BehaviorSubject<number>;
  totalPages: BehaviorSubject<number>;
  currentPage: BehaviorSubject<number>;
  adsPerPage: BehaviorSubject<number>;

  constructor(private httpClient: HttpClient) {
    this.ads = new BehaviorSubject<Array<Ad>>([]);
    this.totalAds = new BehaviorSubject<number>(null);
    this.totalPages = new BehaviorSubject<number>(null);
    this.currentPage = new BehaviorSubject<number>(null);
    this.adsPerPage = new BehaviorSubject<number>(null);
    this.apiUrl = UtilService.getAPIUrl();
  }

  getAds(page = 1, adsPerPage = 10) {
    return this.httpClient
      .get(this.apiUrl + '/api/v1/ads?page=' + page + '&per_page=' + adsPerPage)
      .pipe(
        map((res: any) => {
          const totalAds = res.total_ads;
          const totalPages = res.total_pages;
          const currentPage = res.current_page;
          const adsPerPage = res.ads_per_page;
          const arrayAds = res.ads.map(item => {
            return new Ad(
              item.id,
              item.title,
              item.body,
              item.circulationDate,
              item.mileage,
              item.price,
              item.reference,
              item.publishedAt,
              item.updatedAt,
              item.hasFiveDoors,
              item.hasMechanicalGearbox,
              item.CO2emission,
              item.seatNbr,
              item.speedNbr,
              item.consumptionL100,
              item.isLeatherUpholstery,
              item.displacement,
              item.dinPower,
              item.fiscalPower,
              item.maxSpeed,
              item.acceleration,
              new Fuel(item.fuel.id, item.fuel.type),
              new Color(
                item.color.id, 
                item.color.color, 
                item.color.paintType
              ),
              new Car(
                item.car.id,
                new Generation(
                  item.car.generation.id,
                  item.car.generation.generation
                ),
                new Version(
                  item.car.version.id,
                  item.car.version.name
                ),
                new Model(
                  item.car.model.id,
                  item.car.model.name,
                  new Builder(
                    item.car.model.builder.id,
                    item.car.model.builder.name
                  )
                )
              ),
              new CritAir(),
              [new Opzione()],
              new Garage());
          });
          return { totalAds: totalAds, totalPages: totalPages, currentPage: currentPage, adsPerPage: adsPerPage, ads: arrayAds };
        })
      )
      .subscribe((data: any) => {
        this.totalAds.next(data.totalAds);
        this.totalPages.next(data.totalPages);
        this.currentPage.next(data.currentPage);
        this.adsPerPage.next(data.adsPerPage);
        this.ads.next(data.ads);
        console.log(data);
      });
  }
}
