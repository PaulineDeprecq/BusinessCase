import { Ad } from './../../../models/compose/ad.model';
import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-preview-card',
  templateUrl: './preview-card.component.html',
  styleUrls: ['./preview-card.component.css']
})
export class PreviewCardComponent implements OnInit {

  @Input() ad: Ad;

  detailsUrl: string;

  constructor() {}

  ngOnInit(): void {
    this.detailsUrl = '/ad/' + this.ad.id;
  }

}
