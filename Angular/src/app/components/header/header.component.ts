import { AuthService } from './../../services/auth/auth.service';
import { Subscription } from 'rxjs';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {

  isAuth: boolean;
  isAuthSub: Subscription;

  constructor(private authService: AuthService) {}

  ngOnInit(): void {
    this._initSubs();
  }

  onClickLogout() {
    this.authService.signOut();
  }

  _initSubs() {
    this.isAuthSub = this.authService.isAuth.subscribe(
      (isAuth: boolean) => this.isAuth = isAuth
    );
  }
}
