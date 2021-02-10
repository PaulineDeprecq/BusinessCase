import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { CarCardComponent } from './components/car/car-card/car-card.component';
import { PicturesCardComponent } from './components/car/pictures-card/pictures-card.component';
import { InfosCardComponent } from './components/car/infos-card/infos-card.component';
import { ProfessionalInfosComponent } from './components/professional/professional-infos/professional-infos.component';
import { AdsManagementComponent } from './components/professional/ads-management/ads-management.component';
import { GaragesManagementComponent } from './components/professional/garages-management/garages-management.component';
import { HomeViewComponent } from './views/home-view/home-view.component';
import { ErrorViewComponent } from './views/error-view/error-view.component';
import { ShowAdViewComponent } from './views/ad/show-ad-view/show-ad-view.component';
import { AddAdViewComponent } from './views/ad/add-ad-view/add-ad-view.component';
import { EditAdViewComponent } from './views/ad/edit-ad-view/edit-ad-view.component';
import { ProfileViewComponent } from './views/profile-view/profile-view.component';
import { AuthViewComponent } from './views/auth-view/auth-view.component';
import { ResearchComponent } from './components/research/research.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { PreviewCardComponent } from './components/car/preview-card/preview-card.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { HttpClientModule } from '@angular/common/http';
import { NgxSliderModule } from '@angular-slider/ngx-slider';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { SigninFormComponent } from './components/signin-form/signin-form.component';
import { SignupFormComponent } from './components/signup-form/signup-form.component';
import { Co2SchemaComponent } from './components/car/co2-schema/co2-schema.component';
import { ThousandSeparatorPipe } from './pipes/thousand-separator.pipe';

@NgModule({
  declarations: [
    AddAdViewComponent,
    AdsManagementComponent,
    AppComponent,
    AuthViewComponent,
    CarCardComponent,
    EditAdViewComponent,
    ErrorViewComponent,
    FooterComponent,
    GaragesManagementComponent,
    HeaderComponent,
    HomeViewComponent,
    InfosCardComponent,
    PicturesCardComponent,
    PreviewCardComponent,
    ProfessionalInfosComponent,
    ProfileViewComponent,
    ResearchComponent,
    ShowAdViewComponent,
    SigninFormComponent,
    SignupFormComponent,
    Co2SchemaComponent,
    ThousandSeparatorPipe,
  ],
  imports: [
    AppRoutingModule,
    BrowserAnimationsModule,
    BrowserModule,
    FormsModule,
    HttpClientModule,
    NgxSliderModule,
    ReactiveFormsModule,
    NgbModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
