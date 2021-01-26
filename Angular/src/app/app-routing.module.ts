import { AuthGuard } from './services/guards/auth-guard/auth.guard';
import { ErrorViewComponent } from './views/error-view/error-view.component';
import { ProfileViewComponent } from './views/profile-view/profile-view.component';
import { EditAdViewComponent } from './views/ad/edit-ad-view/edit-ad-view.component';
import { AddAdViewComponent } from './views/ad/add-ad-view/add-ad-view.component';
import { ShowAdViewComponent } from './views/ad/show-ad-view/show-ad-view.component';
import { HomeViewComponent } from './views/home-view/home-view.component';
import { AuthViewComponent } from './views/auth-view/auth-view.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

const routes: Routes = [
  { path: 'auth', component: AuthViewComponent },
  { path: '', component: HomeViewComponent },
  { path: 'ad/:id', component: ShowAdViewComponent },
  { path: 'ad/add', canActivate: [AuthGuard], component: AddAdViewComponent },
  { path: 'ad/edit/:id', canActivate: [AuthGuard], component: EditAdViewComponent },
  { path: 'profile/:id', canActivate: [AuthGuard], component: ProfileViewComponent },
  { path: '**', component: ErrorViewComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
