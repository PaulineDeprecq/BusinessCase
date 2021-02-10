import { AuthService } from './../../services/auth/auth.service';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-signin-form',
  templateUrl: './signin-form.component.html',
  styleUrls: ['./signin-form.component.css']
})
export class SigninFormComponent implements OnInit {
  
  loginForm: FormGroup;
  errorMsg: string;

  constructor(
    private authService: AuthService,
    private formBuilder: FormBuilder,
    private router: Router
  ) {}

  ngOnInit(): void {
    this._initForm();
  }

  _initForm() {
    this.loginForm = this.formBuilder.group({
      username: ['', [Validators.required]],
      password: ['', [Validators.required]]
    });
  }

  onSubmitSignIn() {
    this.errorMsg = undefined;
    const formValues = this.loginForm.value;
    this.authService.checkLogin(formValues.username, formValues.password)
      .then(() => {
        this.router.navigate(['profile']);
      })
      .catch((error: string) => {
        this.errorMsg = error;
        console.log(error);
      });
  }

}
