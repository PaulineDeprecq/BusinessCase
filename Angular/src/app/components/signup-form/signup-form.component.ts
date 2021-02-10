import { User } from './../../models/user/user.model';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-signup-form',
  templateUrl: './signup-form.component.html',
  styleUrls: ['./signup-form.component.css']
})
export class SignupFormComponent implements OnInit {

  user: User;

  signUpForm: FormGroup;

  errorMsg: string;

  constructor(private formBuilder: FormBuilder) {
    this.user = new User('', '', '', '', '', '', '', false);
  }

  ngOnInit(): void {
    this._initForm();
  }

  _initForm() {
    this.signUpForm = this.formBuilder.group({
      'firstname': ['', Validators.required],
      'lastname': ['', Validators.required],
      'email': ['', Validators.required],
      'password': ['', Validators.required],
    });
  }

  onSubmitSignupForm() {
    console.log(this.user);
  }

}
