import { User } from './../../models/user/user.model';
import { BehaviorSubject } from 'rxjs';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  token: BehaviorSubject<string>;

  constructor() {
    this.token = new BehaviorSubject<string>(null);
  }

  signUp(newUser: User) {
    return new Promise(
      (res, rej) => {
        
      }
    )
  }
}
