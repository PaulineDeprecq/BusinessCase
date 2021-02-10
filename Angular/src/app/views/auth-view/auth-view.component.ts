import { Location } from '@angular/common';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-auth-view',
  templateUrl: './auth-view.component.html',
  styleUrls: ['./auth-view.component.css']
})
export class AuthViewComponent implements OnInit {

  title: string;
  type: string;

  constructor(private location: Location) {}

  ngOnInit(): void {
    this.getPath();
  }

  getPath() {
    const path = this.location.prepareExternalUrl(this.location.path()).slice(1);
    if(path === 'signup') {
      this.title = 'Inscription';
      this.type = 'signup';
    } else if(path === 'signin') {
      this.title = 'Connexion';
      this.type = 'signin';
    }
  }

}
