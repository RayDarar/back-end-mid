from django.urls import path
from . import views

urlpatterns = [
  path("users/", views.UserActions.as_view()),
  path("users/validate", views.validate),
  path("users/create", views.create),
  path("users/update", views.update)
]
