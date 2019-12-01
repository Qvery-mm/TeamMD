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
        private Editor messangeProblem;
        private Problems CurrentProblem;

        private void ProblemPage()
        {
            ClMenu();
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

            for (int i = ListOfProblems.Count - 1; i >= 0; i--)
                Newl.Children.Add(CreateFormForProblem(i));
            scroll.ScrollToAsync(0, 0, false);

            Newl.Children.Add(CreateBottom());
        }

        private Frame CreateFormForProblem(int i, params int[] array)
        {
            Problems problems = ListOfProblems[i];
            StackLayout stack = new StackLayout
            {
                Orientation = StackOrientation.Vertical,
            };

            Frame frame = new Frame
            {
                BorderColor = Color.Black,
                CornerRadius = 20,
                BackgroundColor = StyleColor.color3,
                Margin = 20,
                HasShadow = true,
                Content = stack
            };
            stack.Children.Add(new Image
            {
                Source = problems.Picture,
                HorizontalOptions = LayoutOptions.Fill
            });

            StackLayout s = new StackLayout
            {
                Orientation = StackOrientation.Horizontal,
                HorizontalOptions = LayoutOptions.Fill,
                HeightRequest = 30
            };

            s.Children.Add(new Image
            {
                Source = "eye"
            });

            s.Children.Add(new Label
            {
                Text = problems.CountOfSee.ToString()
            });

            stack.Children.Add(s);
            stack.Children.Add(new Label
            {
                Text = problems.Title
            });

            if (array.Length != 0)
            {
                stack.Children.Add(new Label
                {
                    Text = problems.Text,
                });
            }

            stack.Children.Add(new Label
            {
                Text = "Автор статьи: " + problems.Name
            });
            stack.Children.Add(new Label
            {
                Text = problems.Date.ToString().Split(' ')[0]
            });
            if (array.Length == 0)
            {
                Button but = new Button
                {
                    BorderWidth = 1,
                    BorderColor = Color.Black,
                    BackgroundColor = StyleColor.color1,

                    CornerRadius = 10,
                    Text = "Читать",
                    HorizontalOptions = LayoutOptions.Center
                };
                but.Clicked += ClickProblem;
                stack.Children.Add(but);
            }
            return frame;
        }

        private void ClickProblem(object sender, EventArgs e)
        {
            StackLayout stack = (StackLayout)(((Button)sender).Parent);
            string date = ((Label)stack.Children[4]).Text;
            string name = ((Label)stack.Children[3]).Text;
            Problems problem = null;
            workPlace.Children.Clear();
            foreach (Problems problems in ListOfProblems)
            {
                if ("Автор статьи: " + problems.Name == name && problems.Date.ToString().Split(' ')[0] == date)
                {
                    problem = problems;
                }
            }
            CreateOneProblem(problem);
        }

        private void CreateOneProblem(Problems problems)
        {
            workPlace.Children.Clear();
            CurrentProblem = problems;
            problems.CountOfSee++;
            ScrollView scroll = new ScrollView();
            workPlace.Children.Add(scroll);
            StackLayout stack = new StackLayout
            {
                HorizontalOptions = LayoutOptions.Fill,
                Children =
                {
                    CreateFormForProblem(ListOfProblems.IndexOf(problems), 1)
                }
            };
            scroll.Content = stack;

            StackLayout mesStack = new StackLayout
            {
                HorizontalOptions = LayoutOptions.Fill
            };
            stack.Children.Add(mesStack);
            foreach (Comment comment in problems.Comments)
            {
                mesStack.Children.Add(CreateMessange(comment));
            }

            messangeProblem = new Editor();

            Button button = new Button
            {
                Text = "Отправить",
                CornerRadius = 10,
                BackgroundColor = StyleColor.color1,
                TextColor = Color.White
            };
            button.Clicked += ClickSendCommetInProblem;
            workPlace.Children.Add(new StackLayout
            {
                Orientation = StackOrientation.Horizontal,
                HorizontalOptions = LayoutOptions.FillAndExpand,
                Children =
                {
                    new Frame
                    {
                        CornerRadius = 10,
                        HasShadow = true,
                        Padding = 5,
                        BackgroundColor = StyleColor.color3,
                        HorizontalOptions = LayoutOptions.FillAndExpand,
                        Content = messangeProblem
                    },
                    button
                }
            });
        }

        private Frame CreateMessange(Comment comment)
        {
            Label label = new Label { Text = comment.Text};
            Frame frame = new Frame
            {
                Content = label,
                CornerRadius = 15,
                HasShadow = true,
                Padding = 5,
                Margin = new Thickness(20, 10, 20, 10)
            };
            if (comment.Name == CurrentClient.Login)
            {
                frame.BackgroundColor = StyleColor.color2;
                label.HorizontalOptions = LayoutOptions.EndAndExpand;
            }
            else
            {
                frame.BackgroundColor = StyleColor.color3;
                label.HorizontalOptions = LayoutOptions.Start;
            }
            return frame;
        }

        private void ClickSendCommetInProblem(object sender, EventArgs e)
        {
            CurrentProblem.Comments.Add(new Comment
                    {
                        Text = messangeProblem.Text,
                        Name = CurrentClient.Login,
                        Date = DateTime.Now
                    }
            );

            CreateOneProblem(CurrentProblem);
        }
    }
}
