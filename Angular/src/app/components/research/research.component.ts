import { Options } from '@angular-slider/ngx-slider';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-research',
  templateUrl: './research.component.html',
  styleUrls: ['./research.component.css']
})
export class ResearchComponent implements OnInit {

  yearValue: number = 1980;
  yearMaxValue: number = 2010;
  yearOptions: Options = {
    floor: 1950,
    ceil: 2021
  };
  
  priceValue: number = 10000;
  priceMaxValue: number = 70000;
  priceOptions: Options = {
    floor: 0,
    ceil: 100000
  };

  constructor() { }

  ngOnInit(): void {
  }

}
