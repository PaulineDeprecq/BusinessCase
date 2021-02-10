import { UtilService } from './../../util/util.service';
import { Ad } from './../../../models/compose/ad.model';
import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})

export class AdService {
  apiUrl: string;

  ads: BehaviorSubject<Array<Ad>>;
  adsPerPage: BehaviorSubject<number>;
  currentPage: BehaviorSubject<number>;
  totalAds: BehaviorSubject<number>;
  totalPages: BehaviorSubject<number>;

  ad: BehaviorSubject<Ad>;

  builder: BehaviorSubject<string>;
  model: BehaviorSubject<string>;
  fuel: BehaviorSubject<string>;

  constructor(private httpClient: HttpClient) {
    this.apiUrl = UtilService.getAPIUrl();

    this.ads = new BehaviorSubject<Array<Ad>>([]);
    this.adsPerPage = new BehaviorSubject<number>(null);
    this.currentPage = new BehaviorSubject<number>(null);
    this.totalAds = new BehaviorSubject<number>(null);
    this.totalPages = new BehaviorSubject<number>(null);

    this.ad = new BehaviorSubject<Ad>(null);

    this.builder = new BehaviorSubject<string>(null);
    this.model = new BehaviorSubject<string>(null);
    this.fuel = new BehaviorSubject<string>(null);
  }

  getAds(page: number, adsPerPage = 10, builder = null, model = null, fuel = null, 
          yearMin = '1950', yearMax = new Date().getFullYear(), 
          priceMin = 0, priceMax = 100000) {

    let apiUrlPlus = '/api/v1/ads?page=' + page + '&per_page=' + adsPerPage
                    + '&year_min=' + yearMin + '&year_max=' + yearMax
                    + '&price_min=' + priceMin + '&price_max=' + priceMax;
    
    this.nextCarInBehav(builder, model, fuel);

    if(builder) apiUrlPlus += '&builder=' + builder;
    if(model) apiUrlPlus += '&model=' + model;
    if(fuel) apiUrlPlus += '&fuel=' + fuel;

    return this.httpClient
      .get(this.apiUrl + apiUrlPlus)
      .pipe(
        map((res: any) => {
          const adsPerPage = res.ads_per_page,
                arrayAds = res.ads.map((item: any) => Ad.fromJSON(item)),
                currentPage = res.current_page,
                totalAds = res.total_ads,
                totalPages = res.total_pages;
          return { adsPerPage: adsPerPage, ads: arrayAds, currentPage: currentPage, totalAds: totalAds, totalPages: totalPages };
        })
      )
      .subscribe((data: any) => {
        this.ads.next(data.ads);
        this.adsPerPage.next(data.adsPerPage);
        this.currentPage.next(data.currentPage);
        this.totalAds.next(data.totalAds);
        this.totalPages.next(data.totalPages);
      });
  }

  getAdByID(id: number) {
    return new Promise<Ad>((res, rej) => {

     this.httpClient
      .get(this.apiUrl + '/api/v1/ads/' + id)
      .pipe(
        map((res: any) => {
          const ad = Ad.fromJSON(res);
          return { ad: ad };
        })
      )
      .subscribe((data: any) => {
        res(data.ad);
      });
    });
  }

  nextCarInBehav(builder: string | null, model: string | null, fuel: string | null) {
    this.builder.next(builder);
    this.model.next(model);
    this.fuel.next(fuel);
  }
}
