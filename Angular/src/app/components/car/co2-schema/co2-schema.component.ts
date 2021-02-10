import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-co2-schema',
  templateUrl: './co2-schema.component.html',
  styleUrls: ['./co2-schema.component.css']
})
export class Co2SchemaComponent implements OnInit {

  @Input() emission: number | null;

  constructor() { }

  ngOnInit(): void {
    console.log(this.emission);
  }

}
