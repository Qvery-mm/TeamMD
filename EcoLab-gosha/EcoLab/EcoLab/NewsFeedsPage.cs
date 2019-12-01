using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Xamarin.Forms;

namespace EcoLab
{
    public partial class MainPage : ContentPage
    {
        private void NewsFeed()
        {
            ClMenu();

            Button button = new Button { };
            workPlace.Children.Clear();

            StackLayout Newl = new StackLayout
            {
                Orientation = StackOrientation.Vertical,
                VerticalOptions = LayoutOptions.Start
            };

            workPlace.Children.Add(Newl);
            Newl.Children.Add(new Label
            {
                BackgroundColor = Color.FromRgb(9, 83, 148),
                HorizontalOptions = LayoutOptions.Fill,
                HeightRequest = 5
            });
            StackLayout titelStack = new StackLayout
            {
                Orientation = StackOrientation.Vertical,
            };
            Newl.Children.Add(titelStack);
            titelStack.Children.Add(new Image
            { 
                Source = "nature.jpj"
            });

            Newl.Children.Add(new Label
            {
                HorizontalOptions = LayoutOptions.Fill,
                BackgroundColor = StyleColor.color4,
                HeightRequest = 10
            });

            Newl.Children.Add(new Frame
            {
                CornerRadius = 10,
                BackgroundColor = StyleColor.color1,
                Margin = 20,
                HasShadow = true,
                Padding = 15,
                Content = new Label
                {
                    HorizontalTextAlignment = TextAlignment.Center,
                    HorizontalOptions = LayoutOptions.Fill,
                    TextColor = Color.White,
                    FontSize = 20,
                    FontAttributes = FontAttributes.Bold,
                    Text = "ОСТРЫЕ ПРОБЛЕМЫ"
                }
            });

            if (CreateFormForProblem(ListOfProblems.Count - 1) != null)
            {
                Newl.Children.Add(CreateFormForProblem(ListOfProblems.Count - 1));
            }


            if (CreateFormForProblem(ListOfProblems.Count - 2) != null)
            {
                Newl.Children.Add(CreateFormForProblem(ListOfProblems.Count - 2));
            }

            button = new Button
            {
                Text = "Читать больше",
                HorizontalOptions = LayoutOptions.Center,
                Margin = new Thickness(30, 10, 30, 30),
                CornerRadius = 10,
                BorderColor = Color.Black,
                BackgroundColor = StyleColor.color1,
                BorderWidth = 1
            };

            button.Clicked += CreateProblem;
            Newl.Children.Add(button);

            Newl.Children.Add(new Label
            {
                HorizontalOptions = LayoutOptions.Fill,
                BackgroundColor = StyleColor.color4,
                HeightRequest = 10
            });

            Newl.Children.Add(new Frame
            {
                CornerRadius = 10,
                BackgroundColor = StyleColor.color1,
                Margin = 20,
                HasShadow = true,
                Padding = 15,
                Content = new Label
                {
                    HorizontalTextAlignment = TextAlignment.Center,
                    HorizontalOptions = LayoutOptions.Fill,
                    TextColor = Color.White,
                    FontSize = 20,
                    FontAttributes = FontAttributes.Bold,
                    Text = "МЕРОПРИЯТИЯ"
                }
            });

            Newl.Children.Add(CreateFormForEvent(ListOfEvent.Count - 1));
            Newl.Children.Add(CreateFormForEvent(ListOfEvent.Count - 2));
            button = new Button
            {
                Text = "Узнать больше больше",
                HorizontalOptions = LayoutOptions.Center,
                Margin = new Thickness(30, 10, 30, 30),
                CornerRadius = 10,
                BorderColor = Color.Black,
                BackgroundColor = StyleColor.color1,
                BorderWidth = 1
            };
            button.Clicked += CreateEnum;
            Newl.Children.Add(button);

            Newl.Children.Add(new Label
            {
                HorizontalOptions = LayoutOptions.Fill,
                BackgroundColor = StyleColor.color4,
                HeightRequest = 10
            });

            Newl.Children.Add(new Label
            {
                Text = "Наши достижения и новости",
                FontSize = 35,
                HorizontalTextAlignment = TextAlignment.Center,
                VerticalTextAlignment = TextAlignment.Center,
                HeightRequest = 100,
                BackgroundColor = BackgroundColor = Color.FromRgba(0, 0, 0, 0.05),
                HorizontalOptions = LayoutOptions.Fill
            });
            //Newl.Children.Add(CreateFormForNew(ListOfNews.Count - 1));
            //Newl.Children.Add(CreateFormForNew(ListOfNews.Count - 2)); ;
            button = new Button
            {
                Text = "Читать больше",
                HorizontalOptions = LayoutOptions.Center,
                Margin = 30,
                BackgroundColor = Color.FromRgba(0, 0, 0, 0.05)
            };
            //button.Clicked += CreateNews;
            Newl.Children.Add(button);

            Newl.Children.Add(new Frame
            {
                HasShadow = true,
                Padding = 0,
                Content = CreateBottom()
            });
        }
        private StackLayout CreateBottom()
        {
            StackLayout bot = new StackLayout { HorizontalOptions = LayoutOptions.Fill, Orientation = StackOrientation.Vertical, BackgroundColor = Color.FromRgb(9, 83, 148), Padding = 10 };
            bot.Children.Add(new Label { Text = "тел: +7 (933) 555-66-33", TextColor = Color.White, HorizontalOptions = LayoutOptions.Fill, HorizontalTextAlignment = TextAlignment.Start });
            bot.Children.Add(new Label { Text = "e-mail: EcoLab@mail.ru", TextColor = Color.White, HorizontalOptions = LayoutOptions.Fill, HorizontalTextAlignment = TextAlignment.Start });
            bot.Children.Add(new Label { Text = "&copy; 2019 EcoLab. All Rights Reserved.", TextColor = Color.White, HorizontalOptions = LayoutOptions.Fill, HorizontalTextAlignment = TextAlignment.Center });
            bot.Children.Add(new Label { Text = "Designed by Team MD", TextColor = Color.White, HorizontalOptions = LayoutOptions.Fill, HorizontalTextAlignment = TextAlignment.Center });
            return bot;
        }        
    }
}
