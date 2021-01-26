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

  constructor(private adService: AdService) {}

  ngOnInit(): void {
    this.adService.getAds();
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
      (currentPage: number) => {
        this.currentPage = currentPage;
      }
    );
    this.adsPerPageSub = this.adService.adsPerPage.subscribe(
      (adsPerPage: number) => this.adsPerPage = adsPerPage
    );
  }

  onClickChangePages(page: string) {
    if(page === 'next') {
      this.adService.getAds(this.currentPage + 1, this.adsPerPage);
    }
    else if(page === 'prev') {
      this.adService.getAds(this.currentPage - 1, this.adsPerPage);
    }
  }

  ngOnDestroy() {
    this.adsSubscription.unsubscribe();
    this.totalAdsSub.unsubscribe();
    this.pagesSub.unsubscribe();
    this.currentPageSub.unsubscribe();
    this.adsPerPageSub.unsubscribe();
  }

}
