import { Ad } from './../../models/compose/ad.model';
import { AdService } from './../../services/compose/ad/ad.service';
import { Component, OnDestroy, OnInit } from '@angular/core';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-home-view',
  templateUrl: './home-view.component.html',
  styleUrls: ['./home-view.component.css']
})

export class HomeViewComponent implements OnInit, OnDestroy {

  ads: Array<Ad>;
  adsSubscription: Subscription;

  totalAds: number;
  totalAdsSub: Subscription;

  totalPages: number;
  pagesSub: Subscription;

  currentPage: number;
  currentPageSub: Subscription;
  
  adsPerPage: number;
  adsPerPageSub: Subscription;

  currentBuilder: string;
  currentBuilderSub: Subscription;

  currentModel: string;
  currentModelSub: Subscription;

  currentFuel: string;
  currentFuelSub: Subscription;

  constructor(private adService: AdService) {}

  ngOnInit(): void {
    this.adService.getAds(1);
    this._initSubs();
  }

  callGetAds(page: number) {
    this.adService.getAds(page, this.adsPerPage, this.currentBuilder, this.currentModel, this.currentFuel);
  }

  onClickChangePages(page: string) {
    if(page === 'next') this.callGetAds(this.currentPage + 1);
    else if(page === 'prev') this.callGetAds(this.currentPage - 1);
  }

  onChangeAdsPerPage(adsPerPage: number) {
    this.adService.adsPerPage.next(adsPerPage);
    this.callGetAds(1);
  }

  ngOnDestroy() {
    this.adsSubscription.unsubscribe();
    this.totalAdsSub.unsubscribe();
    this.pagesSub.unsubscribe();
    this.currentPageSub.unsubscribe();
    this.adsPerPageSub.unsubscribe();
  }

  _initSubs() {
    this.adsSubscription = this.adService.ads.subscribe(
      (ads: Array<Ad>) => this.ads = ads
    );
    this.totalAdsSub = this.adService.totalAds.subscribe(
      (totalAds: number) => this.totalAds = totalAds
    );
    this.pagesSub = this.adService.totalPages.subscribe(
      (totalPages: number) => this.totalPages = totalPages
    );
    this.currentPageSub = this.adService.currentPage.subscribe(
      (currentPage: number) => this.currentPage = currentPage
    );
    this.adsPerPageSub = this.adService.adsPerPage.subscribe(
      (adsPerPage: number) => this.adsPerPage = adsPerPage
    );

    this.currentBuilderSub = this.adService.builder.subscribe(
      (currentBuilder: string) => this.currentBuilder = currentBuilder
    );
    this.currentModelSub = this.adService.model.subscribe(
      (currentModel: string) => this.currentModel = currentModel
    );
    this.currentFuelSub = this.adService.fuel.subscribe(
      (currentFuel: string) => this.currentFuel = currentFuel
    );
  }
}
