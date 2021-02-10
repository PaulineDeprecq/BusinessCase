import { Router } from '@angular/router';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { UtilService } from './../util/util.service';
import { User } from './../../models/user/user.model';
import { BehaviorSubject } from 'rxjs';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  apiUrl: string;
  token: BehaviorSubject<string>;

  isAuth: BehaviorSubject<boolean>;

  constructor(private httpClient: HttpClient, private router: Router) {
    this.apiUrl = UtilService.getAPIUrl();
    this.token = new BehaviorSubject<string>(null);
    this.isAuth = new BehaviorSubject<boolean>(false);
  }

  checkLogin(username:string, password:string) {
    const headers = new HttpHeaders({
      'Content-Type': 'application/json'
    });

    return new Promise<void>(
      (res, rej) => {
        this.httpClient.post(
          this.apiUrl + '/api/login_check', 
          { username: username, password: password },
          { headers }
        )
        .subscribe(
          (token: string) =>{
            this.token.next(token['token']);
            this.isAuth.next(true);
            res();
          },
          (err: any) => {
            rej(err.error.message);
          }
        );
      }
    );
  }

  signUp(newUser: User) {
    return new Promise(
      (res, rej) => {
        
      }
    )
  }

  signOut() {
    this.token.next(undefined);
    this.isAuth.next(false);
    this.router.navigate(['/']);
  }
}
