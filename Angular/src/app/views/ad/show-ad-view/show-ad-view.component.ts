import { Subscription } from 'rxjs';
import { Ad } from './../../../models/compose/ad.model';
import { ActivatedRoute } from '@angular/router';
import { AdService } from './../../../services/compose/ad/ad.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-show-ad-view',
  templateUrl: './show-ad-view.component.html',
  styleUrls: ['./show-ad-view.component.css']
})
export class ShowAdViewComponent implements OnInit {

  ad: Ad;

  imActivated = true;

  constructor(
    private adService: AdService,
    private route: ActivatedRoute
  ) {}

  ngOnInit(): void {
    const id = this.route.snapshot.params.id;
    this.adService.getAdByID(+id)
      .then(
        ad => this.ad = ad
      );
  }
}
