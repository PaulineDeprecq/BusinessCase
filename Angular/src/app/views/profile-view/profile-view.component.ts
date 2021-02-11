import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-profile-view',
  templateUrl: './profile-view.component.html',
  styleUrls: ['./profile-view.component.css']
})
export class ProfileViewComponent implements OnInit {

  infoActive: boolean;
  garageActive: boolean;
  adActive: boolean;

  constructor() {
    this.infoActive = true;
    this.garageActive = false;
    this.adActive = false;
  }

  ngOnInit(): void {
  }

  onClickActiveLink(link: string) {
    switch(link) {
      case 'info':
        this.infoActive = true;
        this.garageActive = false;
        this.adActive = false;
        break;
      case 'garage':
        this.infoActive = false;
        this.garageActive = true;
        this.adActive = false;
        break;
      case 'ad':
        this.infoActive = false;
        this.garageActive = false;
        this.adActive = true;
        break;
    }
  }
}
